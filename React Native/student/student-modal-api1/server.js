const { response } = require("express");
const express = require("express");
const app = express();
const mongoose = require("mongoose");
const PostModel = require("./models/PostModel");
const StudentModel = require("./models/StudentModel");
const cors =require('cors');

const multer  = require('multer');
const fs = require("fs");

app.use(express.json());
app.use(cors());
app.use(express.static('uploads'));

const uploads = multer({dest:'uploads/'})


app.get("/student/:id", async (request, response) => {
  const studentId = request.params.id
  const student = await StudentModel.findById(studentId);
  
  response.json({
      status: true,
      student: student
  })
})

app.get("/", (request, response) => {
  response.json({
    message: "home address",
  });
});

app.post("/student/create", uploads.single('image'), async (request, response) => {

  console.log(request.file);
  console.log(request.body);

      // extracted extension

  const fileExt = request.file.mimetype.split("/")[1];
  const newFileName = request.file.filename + "." + fileExt;
  const fileWithDestPath = request.file.destination + newFileName;

  fs.rename(request.file.path, fileWithDestPath, () => console.log('done'))

  request.body.photo = newFileName;

     await StudentModel.create(request.body).then((data) => {
          response.json({
              status: true,
              student: data
          })
      }).catch( (error) => {
          response.json({
              status: false,
              message: error.message
          })
      })


  
})

app.get("/students", async (request, response) => {
  const students = await StudentModel.find();
  response.json({
    status: true,
    students: students,
  });
});

app.get("/posts", async (request, response) => {
  const posts = await PostModel.find();
  response.json({
    status: true,
    posts: posts,
  });

});

app.post("/student/create", async (request, response) => {

  const {name, className, city,rollNumber} = request.body;
       await StudentModel.create(request.body).then((data) => {
            response.json({
                status: true,
                student: data
            })
        }).catch( (error) => {
            response.json({
                status: false,
                message: error.message
            })
        })

});

// Delete students with id
app.delete("/students/delete/:id", async (request, response) => {
  const studentsId = request.params.id;
  
  if (!studentsId) {
    return response.json({
      status: false,
      massage: "please provide student Id",
    });
  }

  // check students is exisit or not

  const ExisitStudent = await StudentModel.findById(studentsId);

  if (!ExisitStudent) {
    return response.status(404).json({
      satus: false,
      massage: "student is not exisiting",
    });
  }

  // delted students without any risk
  await StudentModel.findByIdAndDelete(studentsId)
    .then((data) => {
      response.status(200).json({
        satus: true,
        massage: "Student is deleted successfully",
        deleteStudent: data,
      });
    })
    .catch((error) => {
      response.status(500).json({
        satus: false,
        massage: error.massage,
      });
    });
});

app.post("/students/search", async (request, response) => {

  try {

      const queryObj = request.body;
     // console.log(queryObj);

  //    removing empty key/value pair from query which sent from client.
          Object.keys(queryObj).forEach( (k) => queryObj[k] == "" && delete queryObj[k]);

          console.log(queryObj)
        // search with regular expression
        let searchQ = {};
        for(const key in queryObj) {
            if(queryObj.hasOwnProperty(key)) {
                searchQ[key] = { "$regex": queryObj[key], "$options": "i" }
            }
        }
        
      const data =  await StudentModel.find(searchQ)

      return response.json({
          status: true,
          students: data
      })


  } catch (error) {
      return response.status(500).json({
          status: false,
          message: "Error accure"
      })
  }

})

//mongo db connected
mongoose.connect("mongodb://127.0.0.1:27017/studentsApi")
  .then(() => {
    console.log("db connected");
  })
  .catch((error) => {
    console.log("db not connected");
    console.log(error.message);
  });

//start the server on http://localhost:3001
app.listen(3001, () => {
  console.log("server is running on port 3001");
});

const mongoose =require("mongoose");


const StudentSchema = mongoose.Schema({
    name:{
        type:String,
        required:true
    },
    className:{
        type:String,
        required:true
    },
    city:{
        type:String
    },
    phone:{
        type:Number,
        require:true
    },
  

})


const StudentModel = mongoose.model('Student', StudentSchema);
module.exports = StudentModel;



const mongoose = require("mongoose");


const PostSchema = mongoose.Schema({
    title:{
        type:String,
        required:true
    },
    
    city:{
        type:String
    },
    photo:{
        type: String,
        get: setHost
    }
}, { toJSON: {getters: true}}
)


function setHost(photo){
    return "http://localhost:3001/"+ photo;

}


const PostModel=mongoose.model('post',PostSchema);
module.exports = PostModel;
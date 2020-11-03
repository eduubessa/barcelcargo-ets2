const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const Mail = new Schema({
    sender: {
        type: String,
        required: true
    },
    receiver: {
        type: String,
        required: true
    },
    message: {
        type: Date,
        required: false
    },
    html_message: {
        type: String,
        required: false
    },
    status : {
        type: String,
        enum: ["pending", "sent", "failed"],
        default: "pending",
        required: true
    }
});

module.exports = mongoose.model("Mail", Mail);

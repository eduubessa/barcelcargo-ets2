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
        type: String,
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
    },
    created_at : {
        type: Date,
        default: Date.now
    },
    updated_at : {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model("Mail", Mail);

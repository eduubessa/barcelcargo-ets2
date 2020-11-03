'use strict'

const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const UserActivation = new Schema({
    user: {
        type: Schema.Types.ObjectId,
        ref: 'User',
        required: true,
        unique: true
    },
    token: {
        type: String,
        required: true
    },
    status: {
        type: String,
        required: true,
        enum: ["pending", "expired", "used"],
        default: ["pending"]
    },
    created_at: {
        type: Date,
        default: Date.now
    },
    updated_at: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model("UserActivation", UserActivation);

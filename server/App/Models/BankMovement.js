'use strict';

const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const BankMovement = new Schema({
    user: {
        type: Schema.Types.ObjectId,
        required: true,
        ref: 'User'
    },
    description: {
        type: String,
        required: true
    },
    bank_sent: {
        type: Schema.ObjectId,
        required: true,
        ref: 'Bank'
    },
    bank_receiver: {
        type: Schema.ObjectId,
        required: true,
        ref: 'Bank'
    },
    movement: {
      type: Number,
      required: true,
    },
    balance_final: {
        type: Number,
        required: true
    },
    created_at: {
        type: Date,
        default: Date.now
    },
    status: {
        type: String,
        enum: ["pending", "cancelled", "sent"],
        default: "pending"
    }
});

module.exports = mongoose.model('BankMovement', BankMovement);

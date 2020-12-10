'use strict';

const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const BankMovement = new Schema({
    user: {
        type: Schema.Types.ObjectId,
        required: true,
        ref: 'User'
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
    description: {
        type: String,
        required: true
    },
    move_money: {
      type: String,
      required: true,
    },
    balance_final: {
        type: String,
        required: true
    },
    created_at: {
        type: Date,
        default: Date.now
    },
    updated_at: {
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

'use strict';

const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const Bank = new Schema({
    balance: {
        type: String,
        required: true,
        default: 3000.00
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

module.exports = mongoose.model('Bank', Bank);

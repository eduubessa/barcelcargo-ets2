'use strict';

const mongoose = require('mongoose'),
      Schema = mongoose.Schema;

const Bank = new Schema({
    balance: {
        type: Number,
        required: true,
        default: 3000
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

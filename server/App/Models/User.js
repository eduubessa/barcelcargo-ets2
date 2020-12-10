'use strict';

const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const User = new Schema({
    bank: {
        type: Schema.Types.ObjectId,
        ref: 'Bank',
        unique: true,
        required: true
    },
    name: {
        type: String,
        required: true
    },
    nickname: {
        type: String,
        required: true,
        unique: true
    },
    email: {
        type: String,
        required: true,
        unique: true
    },
    password: {
        type: String,
        required: true,
        min: 8,
        max: 100
    },
    birthday: {
        type: Date,
        default: Date.now,
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
        enum: ['pending', 'activated', 'disabled'],
        default: 'pending'
    }
});

module.exports = mongoose.model('User', User);

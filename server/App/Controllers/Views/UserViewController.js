'use strict';

const mongoose = require('mongoose');

// Models
const User = require('../../Models/User');

class UserViewController {

    all(request, response, next)
    {
        return response.json("Controller: UserViewController");
    }

}

module.exports = UserViewController;

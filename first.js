const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();
const port = 3000;

// Connect to the MongoDB database
mongoose.connect('mongodb://localhost/mydatabase');

// Create a schema for the user model
const userSchema = new mongoose.Schema({
  name: String,
  email: String,
  password: String
});

// Create a model for the user collection
const User = mongoose.model('User', userSchema);

// Set up middleware to handle JSON data
app.use(bodyParser.json());

// Set up a route to handle registration form submission
app.post('/register', async (req, res) => {
  const { name, email, password } = req.body;
  const user = new User({ name, email, password });
  try {
    await user.save();
    res.status(201).send('User created successfully!');
  } catch (err) {
    res.status(400).send(err.message);
  }
});

// Start the server
app.listen(port, () => {
  console.log(`Server running at http://localhost:${port}`);
});

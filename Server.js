const express = require('express');
const app = express();
const port = process.env.PORT || 3000;

// Serve static files (HTML, CSS, JS)
app.use(express.static('public'));

// Game Logic
const deck = ['Dragon', 'Tiger'];

app.get('/game', (req, res) => {
    // Simple game logic: Randomly pick Dragon or Tiger
    const result = deck[Math.floor(Math.random() * deck.length)];
    res.json({ result });
});

app.listen(port, () => {
    console.log(`Dragon Tiger Game running at http://localhost:${port}`);
});

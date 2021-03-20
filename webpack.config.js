const path = require('path');

module.exports = {
  mode: 'development',
  entry: './resources/js/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'foo.bundle.js',
  },
};

import React, { Component } from 'react';
import './App.css';
import Preloader from './Components/Preloader/Preloader';

class App extends Component {
  render() {
    return (
      <div className="App">
          <Preloader/>
      </div>
    );
  }
}

export default App;

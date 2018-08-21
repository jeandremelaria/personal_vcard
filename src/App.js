import React, { Component } from 'react';
import './App.css';
import Preloader from './Components/Preloader/Preloader';

class App extends Component {
  constructor(){
    super();
    this.state = { isLoading: true }
  }
  
  componentDidMount(){
    // Set isLoading to false after DOM is rendered
    // this.setState({ isLoading: false}, ()=>{
    //   console.log(this.state.isLoading);
    // }); 
    this.setState({ isLoading: false });
  }

  render() {
    const isLoading = this.state.isLoading;
    return ( isLoading ? <Preloader/> : <p>Test</p> );
  }
}

export default App;

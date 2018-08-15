import React, { Component } from 'react';
import TweenMax from 'gsap';
import { Row, Col } from 'react-materialize';

class Preloader extends Component {
  componentDidMount() {
  TweenMax.staggerFrom('.preloaderCircle', 2, {scale:-1.2, repeat:-1, }, 0.5);
 }
  render() {
    return (
      <Row className = 'preloader'>
        <Col s={1} className = 'preloaderCircle preloaderCircle--purple'></Col>
        <Col s={1} className = 'preloaderCircle preloaderCircle--white'></Col>
        <Col s={1} className = 'preloaderCircle preloaderCircle--purple'></Col>
      </Row>
    );
  }
}

export default Preloader;

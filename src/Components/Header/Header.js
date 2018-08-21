import React from 'react';
import { Row, Col } from 'react-materialize';
import Logo from '../Logo/Logo';
import Menu from '../Menu/Menu';

const header = () => {
  return (
      <div>
        <p>header</p>
        <Logo/>
        <Menu/>
      </div>
  );
}

export default header;
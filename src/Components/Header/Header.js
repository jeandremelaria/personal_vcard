import React from 'react';
import { Row, Col, Navbar, NavItem } from 'react-materialize';
import Logo from '../Logo/Logo';
import Menu from '../Menu/Menu';

const header = () => {
  return (
     <Navbar brand='logo' left>
        <NavItem>1</NavItem>
      
     </Navbar>
  );
}

export default header;
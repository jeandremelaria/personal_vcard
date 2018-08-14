import React from 'react';

const preloader = () => {
  return (
          <div className = 'preloader'> 
            <span className = 'preloaderCircle preloaderCircle--purple'></span>
            <div className = 'preloaderCircle preloaderCircle--white'></div>
            <div className = 'preloaderCircle preloaderCircle--purple'></div>
          </div>
  );
}

export default preloader;
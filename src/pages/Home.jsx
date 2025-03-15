import React from "react";
import LabelessInput from "../components/LabelessInput";
import Button from "../components/Button";
import ImageCard from "../components/ImageCard";

const Home = () => {
  return (
    <div className="home mont-font">
      <header className="home-header flex space-between grey-bg space-evenly pl align-center">
        <h1>Welcome</h1>
        <LabelessInput className="search-bar" />
        <Button imageURL="src\assets\plus.svg" className="upload-btn" />
        <Button text="logout" className="logout-btn" />
      </header>
      <div className="image-container flex wrap">
        <ImageCard src="src\assets\download.jpg" />
        <ImageCard src="src\assets\1_pFwQykPBAmX_a0YDsnRITQ.jpg" />
      </div>
    </div>
  );
};

export default Home;

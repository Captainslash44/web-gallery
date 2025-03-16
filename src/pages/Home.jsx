import React, { useState } from "react";
import LabelessInput from "../components/LabelessInput";
import Button from "../components/Button";
import ImageCard from "../components/ImageCard";
import { useNavigate } from "react-router-dom";
import FileUploader from "../components/FileUploader";

const Home = () => {
  const navigate = useNavigate();

  const [uploadWindow, setUploadWindow] = useState(false);
  return (
    <div id="home" className="home mont-font">
      <header className="home-header flex space-between grey-bg space-evenly pl align-center">
        <h1>Welcome {localStorage.getItem("name")}</h1>
        <LabelessInput className="search-bar tm" />
        <Button
          imageURL="src\assets\plus.svg"
          className="upload-btn tm"
          onClick={() => {
            setUploadWindow(true);
          }}
        />
        <Button
          text="logout"
          className="logout-btn tm"
          onClick={() => {
            localStorage.clear;
            navigate("/login");
          }}
        />
      </header>
      <div id="image-container" className="image-container flex wrap">
        <ImageCard src="src\assets\download.jpg" />
        <ImageCard src="src\assets\1_pFwQykPBAmX_a0YDsnRITQ.jpg" />
      </div>
      <FileUploader trigger={uploadWindow} setTrigger={setUploadWindow} />
    </div>
  );
};

export default Home;

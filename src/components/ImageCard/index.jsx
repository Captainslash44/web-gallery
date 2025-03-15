import React from "react";
import "./styles.css";

const ImageCard = ({ src }) => {
  return (
    <div>
      <img className="image rounded-border tm" src={src} alt="" />
    </div>
  );
};

export default ImageCard;

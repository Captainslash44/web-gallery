import React, { useState } from "react";
import "./styles.css";
import Button from "../Button";
import axios from "axios";

const FileUploader = (props) => {
  const [file, setFile] = useState();

  const image = new FormData();

  const sendImage = async () => {
    image.append("file", file);
    const response = await axios.post(
      "http://localhost/web-gallery/server/upload_image",
      image,
      {
        headers: {
          "Content-Type": "multpart/form-data",
        },
      }
    );
    if (response.data === true) {
      props.setTrigger(false);
    }
  };

  return props.trigger ? (
    <div className="uploader">
      <div className="input-container rounded-border">
        <input
          type="file"
          onChange={(e) => {
            setFile(e.target.files[0]);
          }}
        />
        <Button text="Done" className="rounded-border" onClick={sendImage} />
      </div>
      {props.children}
    </div>
  ) : (
    ""
  );
};

export default FileUploader;

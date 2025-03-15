import React from "react";
import "./styles.css";

const LabelessInput = ({ placeholder, className }) => {
  return (
    <input
      className={`rounded-border primary-bg ${className}`}
      type="text"
      placeholder={placeholder}
    />
  );
};

export default LabelessInput;

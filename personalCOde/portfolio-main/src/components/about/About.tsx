import React, { useState } from "react";
import { Heading, Text } from '@chakra-ui/react';
import { AiFillGithub, AiOutlineBars, AiFillLinkedin } from "react-icons/ai";
import "./About.css";
import {FaBars} from "react-icons/fa"


const About = () => {
  
  const [isVisible, setIsVisible] = useState<boolean>(false);

  const getFontSize = () => {
    let width = window.innerWidth;
    if(width < 450) return "5rem";
    if(width < 1250) return "6rem";
    return "8rem";
  }


  return (
    <>
      <div className="bg" style={{ paddingBottom: "40px" }}>
        <div
          className="alert marginRight desktop"
          style={{
            backgroundColor: "#101320",
            display: "flex",
            alignItems: "flex-end",
            justifyContent: "flex-end",
            position: "fixed",
            width: "100%",
            left: "0",
          }}
        >
          <a href="#home" className="navigation">
            Home
          </a>
          <a href="#skills" className="navigation">
            Skills{" "}
          </a>
          <a href="#project" className="navigation">
            Projects{" "}
          </a>
          <a href="#contact" className="navigation">
            Contact{" "}
          </a>
          <div
            className="mobile"
            style={{
              backgroundColor: "#101320",
              display: "flex",
              alignItems: "flex-end",
              justifyContent: "flex-end",
              position: "fixed",
              width: "100%",
              top: "0",
              left: "0",
              paddingRight: "30px",
              paddingTop: "20px",
              paddingBottom: "20px",
            }}
          >
            <FaBars style={{ fontSize: "40px" }} onClick={() => setIsVisible(!isVisible)} />

            {isVisible && (
              <div
                style={{
                  position: "absolute",
                  top: "80px",
                  paddingLeft: "30px",
                  left: "0",
                  backgroundColor: "#101320",
                  width: "100%",
                  paddingBottom: "40px",
                  display: "flex",
                  flexDirection: "column",
                  alignItems: "flex-start",
                }}
              >
                <a href="#home" className="navigation">
                  Home
                </a>
                <br />
                <a href="#skills" className="navigation">
                  Skills
                </a>
                <br />
                <a href="#project" className="navigation">
                  Projects
                </a>{" "}
                <br />
                <a href="#contact" className="navigation">
                  Contact{" "}
                </a>
              </div>
            )}
          </div>
        </div>

        <div className="about-wrapper" id="home">
          <div className="about-text">
            <div className="about-title">
              <Heading as="h1" fontSize={getFontSize()} size="4xl">
                Hi!
              </Heading>
              <Heading as="h1" fontSize={getFontSize()} size="4xl">
                I'm <span className="name">Yemisi</span>
              </Heading>
            </div>
            <div className="about-text-desc">
              <Text fontSize="3xl">
                A <span className="name">Software Developer</span> based in
                Abuja, Nigeria
              </Text>
            </div>

            <div className="icons">
              <a href="https://github.com/YemmyAde" target="_blank">
                <AiFillGithub className="icon" />
              </a>
              <a href="https://www.linkedin.com/in/yemmyade/" target="_blank">
                <AiFillLinkedin className="icon" />
              </a>
            </div>

            {/* <a href="mailto:contactme@tijan.dev">
            <Button size='lg' rightIcon={<AiOutlineArrowRight />} colorScheme="blue" variant='solid'>
              Contact Me
            </Button>
          </a> */}
          </div>
          <div className="about-avatar">
            <img src="/yemmy.jpg" className="avatar" alt="Adesanya Yemisi" />
          </div>
        </div>
      </div>
    </>
  );  
}

export default About;
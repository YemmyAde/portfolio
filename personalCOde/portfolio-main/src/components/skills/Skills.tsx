import React from "react";
import { skills, Skill } from "./config";
import { v4 as uuidv4 } from 'uuid';
import "./Skills.css";

const Skills = () => {
  return(
    <div className="bg-skills" id="skills">
      <p className="heading">Skillset</p>
      <p className="text" style={{fontSize: "30px", }}>Technologies I use </p>
      <div className="skill-icons-gird">
        {skills.map((skill: Skill) => {
          return(
            <a key={uuidv4()} href={skill.url} target="_blank">
              <div className="skill">
                <img src={skill.img} alt="Skill logo image" />
              </div>
              <p>{skill.name}</p>
            </a>
          )
        })}
      </div>
    </div>
  )
}

export default Skills;
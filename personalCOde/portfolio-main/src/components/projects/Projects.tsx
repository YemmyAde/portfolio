import React from "react";
import { v4 as uuidv4 } from 'uuid';
import { Button,  Heading, Text} from "@chakra-ui/react";
import { projects, Project } from "./config";
import "./Projects.css";

const Projects = () => {
  return (
    <div className="bg-projects" id="project">
      <p className="heading">Portfolio</p>
      <p className="text" style={{ fontSize: "30px" }}>
        Projects have worked on
      </p>
      <div className="projects-grid">
        {projects.map((project: Project) => {
          return (
            <div key={uuidv4()} className="project">
              <img src={project.image} alt="Project" />
              <div className="project-info">
                <Heading as="h6" size="md">
                  {project.name}
                </Heading>
                <Text fontSize="x">{project.description}</Text>
                <div className="project-tags"></div>
                <a href={project.url} target="_blank">
                  <Button size="md" colorScheme="blue" variant="outline">
                    View site
                  </Button>
                </a>
              </div>
            </div>
          );
        })}
      </div>
      <p className="text soon"> . . . more coming soon!</p>
    </div>
  );
}

export default Projects;
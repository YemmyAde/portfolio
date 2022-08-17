import React from "./../../images/react-logo.png";
import HTML from "./../../images/html5-logo.png";
import CSS from "./../../images/css-logo.png";
import JS from "./../../images/js-logo.png";
import TS from "./../../images/ts-logo.png";
import NPM from "./../../images/npm-logo.png";
import YARN from "./../../images/yarn-logo.png";
import Git from "./../../images/git-logo.png";
import Node from "./../../images/node.png";
import Redux from "./../../images/redux.png";
import Express from "./../../images/express.png";
import Tailwind from "./../../images/tailwind.png";
import Mongo from "./../../images/mongo.png";
import Next from "./../../images/next.png";
import Github from "./../../images/github.png";


export type Skill = {
  name: string;
  img: any;
  url: string;
}

export const getSkill = (names: string[]) => {
  let toReturn: Skill[] = [];
  names.map((name: string) => {
    skills.map((skill: Skill) => {
      if(skill.name.toLowerCase() === name.toLowerCase()) {
        toReturn.push(skill);
      }
    });
  })
  return toReturn;
}

export const skills: Skill[] = [
  {
    name: "JavaScript",
    url: "https://developer.mozilla.org/en-US/docs/Web/JavaScript",
    img: JS,
  },
  {
    name: "TypeScript",
    url: "https://www.typescriptlang.org/",
    img: TS,
  },
  {
    name: "React",
    url: "https://reactjs.org/",
    img: React,
  },
  {
    name: "Redux",
    url: "https://redux.js.org/",
    img: Redux,
  },
  {
    name: "NextJs",
    url: "https://nextjs.org/",
    img: Next,
  },
  {
    name: "Tailwind",
    url: "https://tailwindcss.com/",
    img: Tailwind,
  },
  {
    name: "Node",
    url: "https://nodejs.org/",
    img: Node,
  },
  {
    name: "Express",
    url: "https://expressjs.com/",
    img: Express,
  },
  {
    name: "MongoDb",
    url: "https://mongodb.com/",
    img: Mongo,
  },
  {
    name: "HTML",
    url: "https://developer.mozilla.org/en-US/docs/Web/HTML",
    img: HTML,
  },
  {
    name: "CSS",
    url: "https://developer.mozilla.org/en-US/docs/Web/CSS",
    img: CSS,
  },
  {
    name: "NPM",
    url: "https://www.npmjs.com/",
    img: NPM,
  },
  {
    name: "YARN",
    url: "https://yarnpkg.com/",
    img: YARN,
  },
  {
    name: "Git",
    url: "https://git-scm.com/",
    img: Git,
  },
  {
    name: "Github",
    url: "https://github.com/",
    img: Github,
  },
];
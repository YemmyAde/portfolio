import Ceda from "./../../images/ceda.png";
import Mayguard from "./../../images/mayguard.png";
import Wootlab from "./../../images/wootlab.png";
import NJFP from "./../../images/njfp.png";

export type Project = {
  name: string;
  description: string;
  image: any;
  url: string;
};

export const projects: Project[] = [
  {
    name: "Mayguard",
    description:
      "Mayguard is an AI Powered Fraud Prevention for Fintechs and E-commerce in Africa. I worked on this project as a frontend developer using React and Redux.",
    image: Mayguard,
    url: "https://portal.mayguard.ai/",
  },
  {
    name: "Ceda Money",
    description:
      "Ceda Money is platform that convert Payoneer or Wise funds for local money at the best exchange rates on the market with ease.You never lose money when you change with Ceda.",
    image: Ceda,
    url: "https://cedamoney.com",
  },
  {
    name: "Wootlab",
    description:
      "This is a web app that sells Wootlab Innovation services, alongside an adminstrative dashboard that feeds information collected from the web app to the admin.",
    image: Wootlab,
    url: "https://wootlab.ng",
  },
  {
    name: "NJFP",
    description:
      "Nigeria Jubilee Fellowship Programme is a youth empowerment partnership initiative between the Federal Government of Nigeria and the United Nations Development Programme. The application has an application platform, administration platform, alumni platform, e-learning platform, monitoring and evaluation (M&E) platform. The frontend of the platforms are developed using NextJs and React.",
    image: NJFP,
    url: "https://njfp.ng",
  },
];

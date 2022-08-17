import React from "react";
import { MdOutlineEmail } from "react-icons/md";
import { AiOutlineGithub, AiOutlineMail } from "react-icons/ai";
import { v4 as uuidv4 } from 'uuid';
import "./Contact.css";

export type Contact = {
  name: string,
  info: string,
  icon: React.ReactElement,
  url: string,
}

export const contacts: Contact[] = [
  {
    name: "EMAIL:",
    info: "yemisadesanya@gmail.com",
    icon: <AiOutlineMail className="contact-icon" />,
    url: "mailto:yemisadesanya@gmail.com",
  },
  {
    name: "GitHub:",
    info: "@yemmyAde",
    icon: <AiOutlineGithub className="contact-icon" />,
    url: "https://github.com/yemmyAde",
  },
];

const Contact = () => {
  return (
    <>
      <div style={{ width: "100%", height: "1px", backgroundColor: "white" }}>
        {" "}
      </div>

      <div className="bg-contact">
        <div className="contact-header">
          <p className="heading">Contact Me</p>
          <p className="text" style={{ fontSize: "30px" }}>
            If you have any questions or want to hire me, please contact me
          </p>
        </div>

        <div className="contact-grid">
          {contacts.map((contact: Contact) => {
            return (
              <a key={uuidv4()} href={contact.url} target="_blank">
                <div className="contact-section">
                  {contact.icon}
                  <div className="contact-text-div">
                    <p className="contact-title">{contact.name}</p>
                    <p className="contact-details">{contact.info}</p>
                  </div>
                </div>
              </a>
            );
          })}
        </div>
      </div>
    </>
  );
}

export default Contact;
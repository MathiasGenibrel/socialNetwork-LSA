# socialNetwork-LSA

Create Social Network with Symfony for LiveCampus

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

[![Product Name Screen Shot][product-screenshot]](https://example.com)

This project is a study project which aims to create a corporate social network which aims to look like a forum.

Here's a blank template to get started: To avoid retyping too much info. Do a search and replace with your text editor for the following: `github_username`, `repo_name`, `twitter_handle`, `linkedin_username`, `email_client`, `email`, `project_title`, `project_description`

<p align="right">(<a href="#top">back to top</a>)</p>

### Built With

- [Symfony](https://symfony.com)
- [Symfony - Webpack Encore](https://symfony.com/doc/current/frontend.html#webpack-encore)
- [Symfony - Security Bundle](https://symfony.com/doc/current/reference/configuration/security.html)
- [Bootstrap](https://getbootstrap.com)

<p align="right">(<a href="#top">back to top</a>)</p>

<!-- GETTING STARTED -->

## Getting Started

### Prerequisites

To launch the project, you will first need :

- [MySQL](https://www.mysql.com/)
- [Symfony](https://symfony.com/)
- [Composer](https://getcomposer.org)
- Package Manager (**One** of them) :
  - [npm](https://www.npmjs.com/)
  - [yarn](https://yarnpkg.com/)

### Installation

1. Clone the repo
   ```sh
    git clone https://github.com/MathiasGenibrel/socialNetwork-LSA.git
   ```
2. Install NPM packages
   ```sh
    npm install
   ```
3. Install Composer packages
   ```sh
    symfony composer install
   ```
4. Change environment variables to be able to connect to your MySQL environment

   ```env
     DATABASE_URL=mysql://USERNAME:PASSWORD@DATABASE_DOMAINE:PORT/socialNetwork-LSA
   ```

5. Create database
   ```sh
    symfony console doctrine:database:create
   ```
6. Create tables
   ```sh
    symfony console doctrine:migrations:migrate
   ```
7. Launch the project
   ```sh
    symfony server:start
   ```
8. Lauch css webpack builder
   ```sh
     npm run watch
   ```

<p align="right">(<a href="#top">back to top</a>)</p>

## Usage

When you launch the project, you will be able to see the following page:

Normaly, you land on the login page.
![Login Screen Shot](./assets/images/login.png)

And you can go to the registration page by clicking on the link `Register now`
![Register Screen Shot](./assets/images/register.png)

When you are logged in, you will be able to see the home page.
![Home Screen Shot](./assets/images/home.png)

In this case, you can move to board to create new Category if you are insider or admin.
![Create Category Screen Shot](./assets/images/Home_NavBar_Board.png)

And voilà ! Your category is on !
![Category Screen Shot](./assets/images/Board--NewCategory.png)

When you access to a category, you can see the list of posts.
![Category Screen Shot](./assets/images/Post.png)

<p align="right">(<a href="#top">back to top</a>)</p>

## Contact

Randa Ragheb - [Contact](mailto randa.ragheb@livecampus.tech) <br>
Chris Centaure - [Contact](mailto chris.centaure@livecampus.tech) <br>
Mateo Dubernet - [Contact](mailto mateo.dubernet@livecampus.tech) <br>
Mathias Genibrel - [Contact](mailto mathias.genibrel@livecampus.tech) <br>

Project Requirement: [specifications](./Projet%20Symfony.pdf)

<p align="right">(<a href="#top">back to top</a>)</p>
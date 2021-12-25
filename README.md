# Bienvenido al Sistema de Exploracion Andinas S.A.C.

![](https://www.hidroalemana.com.pe/wp-content/uploads/2021/03/logo-exploraciones-andinas.jpg)
**Tabla de Contenido**
![Estado de la construcción](https://gitlab.com/pages/plain-html/badges/master/build.svg)

---

Ejemplo de sitio HTML sin formato usando GitLab Pages.

Obtenga más información sobre las páginas de GitLab en https://pages.gitlab.io y el sitio oficial
documentación https://docs.gitlab.com/ce/user/project/pages/.

---

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- INICIAR TOC generado por doctoc, mantenga el comentario aquí para permitir la actualización automática -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->
<!-- NO EDITE ESTA SECCIÓN, EN LUGAR DE VUELVA A EJECUTAR doctoc PARA ACTUALIZAR -->
**Tabla de contenido**  *generated with [DocToc](https://github.com/thlorenz/doctoc)*

- [GitLab CI](#gitlab-ci)
- [GitLab User or Group Pages](#gitlab-user-or-group-pages)
- [Did you fork this project?](#did-you-fork-this-project)
- [Troubleshooting](#troubleshooting)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## GitLab CI

This project's static Pages are built by [GitLab CI][ci], following the steps
defined in [`.gitlab-ci.yml`](.gitlab-ci.yml):

```
image: alpine:latest

pages:
  stage: deploy
  script:
  - echo 'Nothing to do...'
  artifacts:
    paths:
    - public
  only:
  - master
```

The above example expects to put all your HTML files in the `public/` directory.

## GitLab User or Group Pages

To use this project as your user/group website, you will need one additional
step: just rename your project to `namespace.gitlab.io`, where `namespace` is
your `username` or `groupname`. This can be done by navigating to your
project's **Settings**.

Read more about [user/group Pages][userpages] and [project Pages][projpages].

## Did you fork this project?

If you forked this project for your own use, please go to your project's
**Settings** and remove the forking relationship, which won't be necessary
unless you want to contribute back to the upstream project.

## Troubleshooting

1. CSS is missing! That means that you have wrongly set up the CSS URL in your
   HTML files. Have a look at the [index.html] for an example.

[ci]: https://about.gitlab.com/gitlab-ci/
[index.html]: https://gitlab.com/pages/plain-html/blob/master/public/index.html
[userpages]: https://docs.gitlab.com/ce/user/project/pages/introduction.html#user-or-group-pages
[projpages]: https://docs.gitlab.com/ce/user/project/pages/introduction.html#project-pages

### Features

- Support Standard Markdown / CommonMark and GFM(GitHub Flavored Markdown);
- Full-featured: Real-time Preview, Image (cross-domain) upload, Preformatted text/Code blocks/Tables insert, Code fold, Search replace, Read only, Themes, Multi-languages, L18n, HTML entities, Code syntax highlighting...;
- Markdown Extras : Support ToC (Table of Contents), Emoji, Task lists, @Links...;
- Compatible with all major browsers (IE8+), compatible Zepto.js and iPad;
- Support identification, interpretation, fliter of the HTML tags;
- Support TeX (LaTeX expressions, Based on KaTeX), Flowchart and Sequence Diagram of Markdown extended syntax;
- Support AMD/CMD (Require.js & Sea.js) Module Loader, and Custom/define editor plugins;

# Manual Insertar Dato.md
<span style="display:block;text-align:center">
<img src="https://owlbert.io/images/owlberts-png/Blocks.psd.png" width="400">
</span>


![](https://img.shields.io/github/stars/pandao/editor.md.svg) ![](https://img.shields.io/github/forks/pandao/editor.md.svg) ![](https://img.shields.io/github/tag/pandao/editor.md.svg) ![](https://img.shields.io/github/release/pandao/editor.md.svg) ![](https://img.shields.io/github/issues/pandao/editor.md.svg) ![](https://img.shields.io/bower/v/editor.md.svg)

##### Formato de envio POST**
```json
{
    "name":"String",
    "email":"String",
    "age":"Int",
    "designation ":"String",
}
```

##### Formato de envio GET**

`?variable1=valor1&variable2=valor2`

al iniciar`?` .

**Table of Contents**

[TOCM]

[TOC]

| Tables_in_phpapidb |
|--------------------|
| Employee           |

```sql
CREATE TABLE IF NOT EXISTS `Employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `email` varchar(50),
  `age` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;
```
![](https://www.positronx.io/wp-content/uploads/2020/05/php-rest-api-9820-002.png)

> Demostracion de lectura de Tabla

## UML diagrams

You can render UML diagrams using [Mermaid](https://mermaidjs.github.io/). For example, this will produce a sequence diagram:

```mermaid
sequenceDiagram
Alice ->> Bob: Hello Bob, how are you?
Bob-->>John: How about you John?
Bob--x Alice: I am good thanks!
Bob-x John: I am good thanks!
Note right of John: Bob thinks a long<br/>long time, so long<br/>that the text does<br/>not fit on a row.

Bob-->Alice: Checking with John...
Alice->John: Yes... John, how are you?

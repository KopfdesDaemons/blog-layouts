// This script enables the “Posts” and “Comments” menu tabs on the author page

const body = document.querySelector("body");

function setBodyClass(className) {
    const classesToRemove = ["lime_blog_comments", "lime_blog_posts"];
    classesToRemove.forEach(cls => {
        if (body.classList.contains(cls)) {
            body.classList.remove(cls);
        }
    });
    body.classList.add(className);
}

function click_author_posts() {
    setBodyClass("lime_blog_posts");
}

function click_author_comments() {
    setBodyClass("lime_blog_comments");
}

## Laravel Blog API
This is a simple blog API with CRUD operation.

## Routes available

```
http://localhost:8000/api/v1/blog/articles/0/10            // GET Request for range of articles
http://localhost:8000/api/v1/blog/article/1                // GET Request for a particular article
http://localhost:8000/api/v1/blog/article/create : params  // POST Request with params. [params => id, slug, title, content, keywords]
http://localhost:8000/api/v1/blog/articles/edit/1          // PUT Request for editing post.
http://localhost:8000/api/v1/blog/articles/delete/1        // DELETE Request for deleting an article
```

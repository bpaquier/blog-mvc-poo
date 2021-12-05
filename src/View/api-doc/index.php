<table class="table">
    <thead>
    <tr>
        <th scope="col">Route</th>
        <th scope="col">Method</th>
        <th scope="col">Description</th>
        <th scope="col">Url params</th>
        <th scope="col">JSON</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <th scope="row">/post</th>
            <td>GET</td>
            <td>Get all posts</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/post</th>
            <td>GET</td>
            <td>Get a specific post</td>
            <td>:id (id of the post)</td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/post</th>
            <td>POST</td>
            <td>Create a post</td>
            <td></td>
            <td>
                <ul>
                    <li>post_title</li>
                    <li>author_id</li>
                    <li>post_content</li>
                    <li>post_image (file path)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">/comment</th>
            <td>GET</td>
            <td>Get all comments</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/comment</th>
            <td>GET</td>
            <td>Get a specific comment</td>
            <td>:id (id of the post)</td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/comment</th>
            <td>POST</td>
            <td>Create a comments</td>
            <td></td>
            <td>
                <ul>
                    <li>content</li>
                    <li>post_id</li>
                    <li>author_name</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">/users</th>
            <td>GET</td>
            <td>Get all users</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/users</th>
            <td>GET</td>
            <td>Get a single user</td>
            <td>:id (id of the user)</td>
            <td></td>
        </tr>
        <tr>
            <th scope="row">/users</th>
            <td>POST</td>
            <td>Create an user</td>
            <td></td>
            <td>
                <ul>
                    <li>password</li>
                    <li>email</li>
                    <li>first_name</li>
                    <li>last_name</li>
                    <li>role (admin or default)</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th scope="row">/users</th>
            <td>DELETE</td>
            <td>Delete an user</td>
            <td></td>
            <td><ul><li>id</li></ul></td>
        </tr>
    </tbody>
</table>
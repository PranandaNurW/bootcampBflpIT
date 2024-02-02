// Soal no 1
function fetchUserData(username, callback) {
    const apiUrl = `https://api.github.com/users/${username}`;

    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`Failed to fetch ${username}`);
            }
        })
        .then(userData => {
            callback(null, userData);
        })
        .catch(error => {
            callback(error, null);
        });
}

fetchUserData("PranandaNurW", function (error, userData) {
    if (error) console.error(error);
    else console.log(userData);
});


// Soal no 2
function fetchUserData2(username) {
    return new Promise((resolve, reject) => {
        const apiUrl = `https://api.github.com/users/${username}`;
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Failed to fetch ${username}`);
                }
                return response.json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error);
            });
    });
}

fetchUserData2("PranandaNurW")
    .then(userdData => console.log(userdData))
    .catch(error => console.error(error));


// Soal 3
function loadImage(imageUrl, callback, errorCallback) {
    const callback = new Image();
    imageObject.onload = function () {
        callback(imageObject);
    };
    imageObject.onerror = function () {
        errorCallback(new Error(`Failed to load image from ${imageUrl}`));
    };
    imageObject.src = imageUrl;
}

const imageUrl = 'https://domain.com/image.png';
loadImage(
    imageUrl,
    function (image) {
        document.body.appendChild(image);
        console.log('Image loaded successfully');
    },
    function (error) {
        console.error(error.message);
    }
);

// Soal 4
function loadImagePromise(imageUrl) {
    return new Promise((resolve, reject) => {
        const imageObject = new Image();
        imageObject.onload = function () {
            resolve(imageObject);
        };
        imageObject.onerror = function () {
            reject(new Error(`Failed to load image from ${imageUrl}`));
        };
        imageObject.src = imageUrl;
    });
}

loadImagePromise(imageUrl)
    .then((image) => {
        document.body.appendChild(image);
        console.log('Image loaded successfully');
    })
    .catch((error) => {
        console.error(error.message);
    });

// Soal 5
function fetchPosts() {
    return fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => response.json())
        .then(posts => {
            console.log('Total Posts:', posts.length);
            return posts;
        });
}

function fetchComments() {
    return fetch('https://jsonplaceholder.typicode.com/comments')
        .then(response => response.json())
        .then(comments => {
            console.log('Total Comments:', comments.length);
            return comments;
        });
}

fetchPosts()
    .then(posts => fetchComments())
    .catch(error => console.error(error));

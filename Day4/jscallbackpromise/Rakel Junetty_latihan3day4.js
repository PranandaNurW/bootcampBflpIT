// // Soal No 1
// // Fungsi callback untuk menangani data dari API
// function handleUserData(error, data) {
//     if (error) {
//       console.error("Error:", error);
//     } else {
//       console.log("User Data:", data);
//       // Handle data di sini, misalnya memperbarui UI dengan informasi pengguna
//     }
//   }

// // Fungsi untuk melakukan HTTP GET request dengan callback
//   function fetchUserData(username, callback) {
//     // Lakukan HTTP GET request ke API GitHub
//     const url = `https://api.github.com/users/${username}`;
//     fetch(url)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('Network response was not ok');
//             }
//             return response.json();
//         })
//         .then(data => {
//             // Panggil callback dengan data yang diambil dari API
//             callback(null, data);
//         })
//         .catch(error => {
//             // Panggil callback dengan error jika terjadi kesalahan
//             callback(error, null);
//         });
//   }

//   // Panggil fungsi fetchUserData dengan username dan callback
//   fetchUserData("test", handleUserData);


// // Soal No 2
// // Fungsi untuk melakukan HTTP GET request dengan Promise
// function fetchUserDataPromise(username) {
//     return new Promise((resolve, reject) => {
//         // Lakukan HTTP GET request ke API GitHub
//         const url = `https://api.github.com/users/${username}`;
//         fetch(url)
//             .then(response => {
//                 if (!response.ok) {
//                     throw new Error('Network response was not ok');
//                 }
//                 return response.json();
//             })
//             .then(data => {
//                 // Panggil resolve dengan data yang diambil dari API
//                 resolve(data);
//             })
//             .catch(error => {
//                 // Panggil reject dengan error jika terjadi kesalahan
//                 reject(error);
//             });
//     });
// }

// // Panggil fungsi fetchUserDataPromise dengan username
// fetchUserDataPromise("rakelsjune")
//   .then(data => console.log(data))
//   .catch(error => console.error(error));


// // Soal 3
// // Fungsi untuk memuat gambar dengan menggunakan Callback
// function loadImageCallback(url, successCallback, errorCallback) {
//     const image = new Image();
//     image.onload = function () {
//         successCallback(image);
//     };
//     image.onerror = function () {
//         errorCallback(new Error('Failed to load image'));
//     };
//     image.src = url;
// }

// // Panggil fungsi loadImageCallback dengan URL gambar
// loadImageCallback(
//     'https://example.com/image.jpg',
//     function (image) {
//         // Callback ketika gambar berhasil dimuat
//         document.body.appendChild(image);
//         console.log('Image loaded successfully');
//     },
//     function (error) {
//         // Callback ketika terjadi kesalahan saat memuat gambar
//         console.error(error.message);
//     }
// );

// // Soal 4
// // Fungsi untuk memuat gambar dengan menggunakan Promise
// function loadImagePromise(url) {
//     return new Promise((resolve, reject) => {
//         const image = new Image();
//         image.onload = function () {
//             resolve(image);
//         };
//         image.onerror = function () {
//             reject(new Error('Failed to load image'));
//         };
//         image.src = url;
//     });
// }

// // Panggil fungsi loadImagePromise dengan URL gambar
// loadImagePromise('https://example.com/image.jpg')
//     .then((image) => {
//         // Callback ketika gambar berhasil dimuat
//         document.body.appendChild(image);
//         console.log('Image loaded successfully');
//     })
//     .catch((error) => {
//         // Callback ketika terjadi kesalahan saat memuat gambar
//         console.error(error.message);
//     });

// Soal 5
// Fungsi untuk mengambil data posts dari API
function fetchPosts() {
    return fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => response.json())
        .then(posts => {
            console.log('Total Posts:', posts.length);
            return posts;
        });
}

// Fungsi untuk mengambil data comments dari API
function fetchComments() {
    return fetch('https://jsonplaceholder.typicode.com/comments')
        .then(response => response.json())
        .then(comments => {
            console.log('Total Comments:', comments.length);
            return comments;
        });
}

// Chain promises untuk mengambil data posts dan comments
fetchPosts()
    .then(posts => fetchComments())
    .catch(error => console.error('Error fetching data:', error));

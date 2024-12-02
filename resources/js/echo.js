import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: "78d28ee2ca71f32cf432",
    cluster: "us2",
    forceTLS: true,
});

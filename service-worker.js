self.addEventListener("push", (event) => {
    const notification = event.data.json();

    event.waitUntil(
        self.registration.showNotification(notification.title, {
            body: notification.body,
            icon: notification.icon,
            actions: notification.actions
        })
    )
});


self.addEventListener("notificationclick", (event) => {
    event.waitUntil(
        clients.openWindow(event.action || '/')
    )
})
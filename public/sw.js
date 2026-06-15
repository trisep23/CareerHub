const CACHE_NAME = 'careerhub-cache-v1';
const urlsToCache = [
  '/',
  '/login',
  '/register',
  '/offline',
  '/favicon.ico',
];

// Install Event
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        return cache.addAll(urlsToCache);
      })
  );
});

// Activate Event
self.addEventListener('activate', event => {
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cache => {
          if (cache !== CACHE_NAME) {
            return caches.delete(cache);
          }
        })
      );
    })
  );
});

// Fetch Event
self.addEventListener('fetch', event => {
  // Only handle HTTP/HTTPS (skip chrome-extension, etc.)
  if (!event.request.url.startsWith(self.location.origin)) {
    return;
  }

  event.respondWith(
    caches.match(event.request)
      .then(cachedResponse => {
        if (cachedResponse) {
          return cachedResponse;
        }

        return fetch(event.request)
          .then(response => {
            // Check if we received a valid response
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // Dynamically cache successful requests (only GET)
            if (event.request.method === 'GET') {
              const responseToCache = response.clone();
              caches.open(CACHE_NAME).then(cache => {
                cache.put(event.request, responseToCache);
              });
            }

            return response;
          })
          .catch(() => {
            // If network fails, return offline fallback for HTML pages
            if (event.request.headers.get('accept').includes('text/html')) {
              return caches.match('/offline');
            }
          });
      })
  );
});

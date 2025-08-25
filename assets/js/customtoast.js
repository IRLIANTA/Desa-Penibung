  class ToastSystem {
            constructor() {
                this.container = document.getElementById('toast-container');
                this.toasts = new Map();
                this.init();
            }

            init() {
                // Ensure container exists
                if (!this.container) {
                    this.createContainer();
                }
            }

            createContainer() {
                const container = document.createElement('div');
                container.id = 'toast-container';
                container.className = 'fixed top-4 right-4 z-50 space-y-2 max-w-sm w-full toast-container';
                document.body.appendChild(container);
                this.container = container;
            }

            show(message, type = 'info', duration = 4000) {
                const id = this.generateId();
                const toastElement = this.createToast(id, message, type, duration);
                
                this.container.appendChild(toastElement);
                
                // Store toast reference
                const toastData = {
                    id,
                    element: toastElement,
                    timer: null,
                    type,
                    message,
                    duration
                };
                
                this.toasts.set(id, toastData);

                // Trigger enter animation
                requestAnimationFrame(() => {
                    toastElement.classList.add('toast-enter');
                });

                // Auto remove if duration > 0
                if (duration > 0) {
                    toastData.timer = setTimeout(() => {
                        this.remove(id);
                    }, duration);
                }

                return id;
            }

            createToast(id, message, type, duration) {
                const toast = document.createElement('div');
                toast.className = `toast-item relative flex items-center p-4 rounded-lg shadow-lg border backdrop-blur-sm transition-all duration-300 ease-out transform translate-x-full opacity-0 scale-95 ${this.getToastClasses(type)}`;
                toast.dataset.toastId = id;

                const progressBar = duration > 0 ? 
                    `<div class="absolute top-0 left-0 h-1 bg-current opacity-20 rounded-t-lg toast-progress" style="--duration: ${duration}ms"></div>` 
                    : '';

                toast.innerHTML = `
                    ${progressBar}
                    <div class="mr-3 flex-shrink-0">
                        ${this.getIcon(type)}
                    </div>
                    <div class="flex-1 text-sm font-medium leading-5">
                        ${this.escapeHtml(message)}
                    </div>
                    <button onclick="Toast.remove(${id})" 
                            class="ml-3 flex-shrink-0 p-1 rounded-full hover:bg-black hover:bg-opacity-10 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-current"
                            aria-label="Close notification">
                        ${this.getCloseIcon()}
                    </button>
                `;

                return toast;
            }

            getToastClasses(type) {
                const classes = {
                    'success': 'bg-green-50 border-green-200 text-green-800 toast-success',
                    'warning': 'bg-yellow-50 border-yellow-200 text-yellow-800 toast-warning',
                    'danger': 'bg-red-50 border-red-200 text-red-800 toast-danger',
                    'info': 'bg-blue-50 border-blue-200 text-blue-800 toast-info'
                };
                return classes[type] || classes.info;
            }

            getIcon(type) {
                const iconClass = "w-5 h-5";
                const icons = {
                    'success': `<svg class="${iconClass} text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>`,
                    'warning': `<svg class="${iconClass} text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>`,
                    'danger': `<svg class="${iconClass} text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                               </svg>`,
                    'info': `<svg class="${iconClass} text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                             </svg>`
                };
                return icons[type] || icons.info;
            }

            getCloseIcon() {
                return `<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>`;
            }

            remove(id) {
                const toastData = this.toasts.get(id);
                if (!toastData) return;

                // Clear timer
                if (toastData.timer) {
                    clearTimeout(toastData.timer);
                }

                // Add exit animation
                toastData.element.classList.remove('toast-enter');
                toastData.element.classList.add('toast-exit');

                // Remove from DOM after animation
                setTimeout(() => {
                    if (toastData.element.parentNode) {
                        toastData.element.parentNode.removeChild(toastData.element);
                    }
                    this.toasts.delete(id);
                }, 300);
            }

            removeAll() {
                for (const [id] of this.toasts) {
                    this.remove(id);
                }
            }

            // Shorthand methods
            success(message, duration = 4000) {
                return this.show(message, 'success', duration);
            }

            warning(message, duration = 4000) {
                return this.show(message, 'warning', duration);
            }

            danger(message, duration = 4000) {
                return this.show(message, 'danger', duration);
            }

            info(message, duration = 4000) {
                return this.show(message, 'info', duration);
            }

            // Utility methods
            generateId() {
                return Date.now() + Math.floor(Math.random() * 1000);
            }

            escapeHtml(text) {
                const map = {
                    '&': '&amp;',
                    '<': '&lt;',
                    '>': '&gt;',
                    '"': '&quot;',
                    "'": '&#039;'
                };
                return text.replace(/[&<>"']/g, m => map[m]);
            }

            // Get toast count
            getCount() {
                return this.toasts.size;
            }

            // Get active toasts
            getAll() {
                return Array.from(this.toasts.values());
            }
        }

        // Initialize global Toast instance
        const Toast = new ToastSystem();

        // Demo functions
        function showMultipleToasts() {
            const messages = [
                { message: 'Proses dimulai...', type: 'info' },
                { message: 'Validasi data berhasil!', type: 'success' },
                { message: 'Peringatan: Koneksi lambat', type: 'warning' }
            ];

            messages.forEach((toast, index) => {
                setTimeout(() => {
                    Toast.show(toast.message, toast.type);
                }, index * 500);
            });
        }

        function showRandomToast() {
            const messages = [
                'Operasi berhasil dilakukan!',
                'Data telah disinkronisasi.',
                'Update sistem tersedia.',
                'Backup otomatis selesai.',
                'Notifikasi baru diterima.',
                'Koneksi berhasil dipulihkan.'
            ];
            
            const types = ['success', 'info', 'warning', 'danger'];
            const randomMessage = messages[Math.floor(Math.random() * messages.length)];
            const randomType = types[Math.floor(Math.random() * types.length)];
            
            Toast.show(randomMessage, randomType);
        }

        // Keyboard shortcuts (Optional)
        document.addEventListener('keydown', (e) => {
            if (e.ctrlKey && e.altKey) {
                switch(e.key) {
                    case '1':
                        e.preventDefault();
                        Toast.success('Shortcut Success Toast!');
                        break;
                    case '2':
                        e.preventDefault();
                        Toast.info('Shortcut Info Toast!');
                        break;
                    case '3':
                        e.preventDefault();
                        Toast.warning('Shortcut Warning Toast!');
                        break;
                    case '4':
                        e.preventDefault();
                        Toast.danger('Shortcut Danger Toast!');
                        break;
                    case 'c':
                        e.preventDefault();
                        Toast.removeAll();
                        break;
                }
            }
        });
     
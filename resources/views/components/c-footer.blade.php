<footer class="site-footer mt-5">
    <div class="container py-5">
        <div class="row gy-4">
 
            
            <div class="col-12 col-md-5">
                <a href="{{ route('homepage') }}" class="footer-brand">The Aulab Post</a>
                <p class="footer-text mt-2 mb-0">
                    Il giornale online con notizie verificate dalla nostra redazione.
                </p>
            </div>
 
            
            <div class="col-6 col-md-3">
                <h6 class="footer-title">Sezioni</h6>
                <ul class="list-unstyled mb-0">
                    <li><a href="{{ route('homepage') }}" class="footer-link">Home</a></li>
                    <li><a href="#" class="footer-link">Politica</a></li>
                    <li><a href="#" class="footer-link">Tecnologia</a></li>
                    <li><a href="#" class="footer-link">Sport</a></li>
                </ul>
            </div>
 
            
            <div class="col-6 col-md-4">
                <h6 class="footer-title">Redazione</h6>
                <ul class="list-unstyled mb-0">
                    {{-- Con la User Story 3 questo link porterà al form "Lavora con noi" --}}
                    <li><a href="#" class="footer-link">Lavora con noi</a></li>
                    <li><a href="mailto:redazione@theaulabpost.it" class="footer-link">redazione@theaulabpost.it</a></li>
                </ul>
            </div>
 
        </div>
    </div>
 
    <div class="footer-bottom">
        <div class="container text-center py-3">
            &copy; {{ date('Y') }} The Aulab Post — Tutti i diritti riservati
        </div>
    </div>
</footer>
 
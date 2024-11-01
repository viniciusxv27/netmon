        <main>
            <!-- Header -->
            <header class="header">
                <input type="text" placeholder="Select the network">
                <div class="user-info">
                    <span class="user-icon">&#128100;</span>
                    <span>{{ $user[0]->name }}</span>
                </div>
            </header>

            <!-- Network Traffic Table -->
            <section class="traffic-table">
                <p>Network 1 Traffic</p>
                <br>
                <div class="traffic-entries">
                    <div class="entry">
                        <span>Frame 5: Src MAC: aa:bb:cc:dd:ee:ff, Dest MAC: ff:ee:dd:bb:aa, Src IP: 192.168.1.10, Dest IP: 192.168.1.20, Src Port: 4</span>
                        <button>Edit</button>
                        <button>Delete</button>
                        <button>Info</button>
                    </div>
                    <!-- Repeat .entry as needed for more entries -->
                </div>
                <div class="traffic-entries">
                    <div class="entry">
                        <span>Frame 5: Src MAC: aa:bb:cc:dd:ee:ff, Dest MAC: ff:ee:dd:bb:aa, Src IP: 192.168.1.10, Dest IP: 192.168.1.20, Src Port: 4</span>
                        <button>Edit</button>
                        <button>Delete</button>
                        <button>Info</button>
                    </div>
                    <!-- Repeat .entry as needed for more entries -->
                </div>
                <div class="traffic-entries">
                    <div class="entry">
                        <span>Frame 5: Src MAC: aa:bb:cc:dd:ee:ff, Dest MAC: ff:ee:dd:bb:aa, Src IP: 192.168.1.10, Dest IP: 192.168.1.20, Src Port: 4</span>
                        <button>Edit</button>
                        <button>Delete</button>
                        <button>Info</button>
                    </div>
                    <!-- Repeat .entry as needed for more entries -->
                </div>
            </section>
        </main>
    </div>
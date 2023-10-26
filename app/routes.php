<?php

declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    // get buah by ID
    $app->get('/buah/{buah_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['buah_id'];

        // Menyiapkan SQL untuk memanggil procedure GetBarang
        $sql = "CALL GetBuahByID(:buah_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':buah_id', $id, PDO::PARAM_INT);

        // Jalankan query
        if ($stmt->execute()) {
            // Mengambil hasil dari procedure
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $response->getBody()->write(json_encode($result[0]));
            } else {
                // Jika data tidak ditemukan, kirim respons dengan status 404
                $response->getBody()->write(json_encode(['error' => 'Data buah tidak ditemukan']));
                $response = $response->withStatus(404);
            }
        } else {
            // Tangani kesalahan eksekusi query
            $errorInfo = $stmt->errorInfo();
            $response->getBody()->write(json_encode(['error' => $errorInfo]));
            $response = $response->withStatus(500); // Atur status kode 500 untuk kesalahan server
        }
        return $response->withHeader("Content-Type", "application/json");
    });

     // Get penjual by ID
    $app->get('/penjual/{penjual_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['penjual_id'];

        // Menyiapkan SQL untuk memanggil procedure GetPenjualByID
        $sql = "CALL GetPenjualByID(:penjual_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':penjual_id', $id, PDO::PARAM_INT);

        // Jalankan query
        if ($stmt->execute()) {
            // Mengambil hasil dari procedure
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $response->getBody()->write(json_encode($result[0]));
            } else {
                // Jika data tidak ditemukan, kirim respons dengan status 404
                $response->getBody()->write(json_encode(['error' => 'Data penjual tidak ditemukan']));
                $response = $response->withStatus(404);
            }
        } else {
            // Tangani kesalahan eksekusi query
            $errorInfo = $stmt->errorInfo();
            $response->getBody()->write(json_encode(['error' => $errorInfo]));
            $response = $response->withStatus(500); // Atur status kode 500 untuk kesalahan server
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // get pembeli by ID
    $app->get('/pembeli/{pembeli_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['pembeli_id'];

        // Menyiapkan SQL untuk memanggil procedure GetBarang
        $sql = "CALL GetPembeliByID(:pembeli_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pembeli_id', $id, PDO::PARAM_INT);

        // Jalankan query
        if ($stmt->execute()) {
            // Mengambil hasil dari procedure
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $response->getBody()->write(json_encode($result[0]));
            } else {
                // Jika data tidak ditemukan, kirim respons dengan status 404
                $response->getBody()->write(json_encode(['error' => 'Data pembeli tidak ditemukan']));
                $response = $response->withStatus(404);
            }
        } else {
            // Tangani kesalahan eksekusi query
            $errorInfo = $stmt->errorInfo();
            $response->getBody()->write(json_encode(['error' => $errorInfo]));
            $response = $response->withStatus(500); // Atur status kode 500 untuk kesalahan server
        }
        return $response->withHeader("Content-Type", "application/json");
    });

        // get detail transaksi by ID
    $app->get('/detail_transaksi/{detail_transaksi_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['detail_transaksi_id'];

        // Menyiapkan SQL untuk memanggil procedure GetBarang
        $sql = "CALL GetDetailTransaksiByID(:detail_transaksi_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':detail_transaksi_id', $id, PDO::PARAM_INT);

        // Jalankan query
        if ($stmt->execute()) {
            // Mengambil hasil dari procedure
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $response->getBody()->write(json_encode($result[0]));
            } else {
                // Jika data tidak ditemukan, kirim respons dengan status 404
                $response->getBody()->write(json_encode(['error' => 'Data detail_transaksi tidak ditemukan']));
                $response = $response->withStatus(404);
            }
        } else {
            // Tangani kesalahan eksekusi query
            $errorInfo = $stmt->errorInfo();
            $response->getBody()->write(json_encode(['error' => $errorInfo]));
            $response = $response->withStatus(500); // Atur status kode 500 untuk kesalahan server
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // get transaksi by ID
    $app->get('/transaksi/{transaksi_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['transaksi_id'];

        // Menyiapkan SQL untuk memanggil procedure GetBarang
        $sql = "CALL GetTransaksiByID(:transaksi_id)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':transaksi_id', $id, PDO::PARAM_INT);

        // Jalankan query
        if ($stmt->execute()) {
            // Mengambil hasil dari procedure
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if ($result) {
                $response->getBody()->write(json_encode($result[0]));
            } else {
                // Jika data tidak ditemukan, kirim respons dengan status 404
                $response->getBody()->write(json_encode(['error' => 'Data transaksi tidak ditemukan']));
                $response = $response->withStatus(404);
            }
        } else {
            // Tangani kesalahan eksekusi query
            $errorInfo = $stmt->errorInfo();
            $response->getBody()->write(json_encode(['error' => $errorInfo]));
            $response = $response->withStatus(500); // Atur status kode 500 untuk kesalahan server
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // Post buah
    $app->post('/buah', function(Request $request, Response $response) {
        $parsedBody = $request->getParsedBody();

        $buah_id = $parsedBody['buah_id'];
        $nama_buah = $parsedBody['nama_buah'];
        $harga = $parsedBody['harga'];
        $stok = $parsedBody['stok'];

        $db = $this->get(PDO::class);

        try {
            $query = $db->prepare('CALL CreateBuah(?, ?, ?, ?)');
            $query->bindParam(1, $buah_id, PDO::PARAM_INT);
            $query->bindParam(2, $nama_buah, PDO::PARAM_STR);
            $query->bindParam(3, $harga, PDO::PARAM_INT);
            $query->bindParam(4, $stok, PDO::PARAM_INT);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Detail buah disimpan dengan id ' . $buah_id
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menyimpan buah: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // POST penjual
    $app->post('/penjual', function(Request $request, Response $response) {
        $parsedBody = $request->getParsedBody();

        $penjual_id = $parsedBody['penjual_id'];
        $nama_penjual = $parsedBody['nama_penjual'];
        $alamat_penjual = $parsedBody['alamat_penjual'];
        $telepon_penjual = $parsedBody['telepon_penjual'];

        $db = $this->get(PDO::class);

        try {
            $query = $db->prepare('CALL CreatePenjual(?, ?, ?, ?)');
            $query->bindParam(1, $penjual_id, PDO::PARAM_INT);
            $query->bindParam(2, $nama_penjual, PDO::PARAM_STR);
            $query->bindParam(3, $alamat_penjual, PDO::PARAM_STR);
            $query->bindParam(4, $telepon_penjual, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Detail penjual disimpan dengan id ' . $penjual_id
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menyimpan penjual: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // POST pembeli
    $app->post('/pembeli', function(Request $request, Response $response) {
        $parsedBody = $request->getParsedBody();

        $pembeli_id = $parsedBody['pembeli_id'];
        $nama = $parsedBody['nama'];
        $alamat = $parsedBody['alamat'];
        $telepon = $parsedBody['telepon'];

        $db = $this->get(PDO::class);

        try {
            $query = $db->prepare('CALL CreatePembeli(?, ?, ?, ?)');
            $query->bindParam(1, $pembeli_id, PDO::PARAM_INT);
            $query->bindParam(2, $nama, PDO::PARAM_STR);
            $query->bindParam(3, $alamat, PDO::PARAM_STR);
            $query->bindParam(4, $telepon, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Detail pembeli disimpan dengan id ' . $pembeli_id
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menyimpan pembeli: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // POST detail transaksi
    $app->post('/detail_transaksi', function(Request $request, Response $response) {
        $parsedBody = $request->getParsedBody();

        $detail_transaksi_id = $parsedBody['detail_transaksi_id'];
        $transaksi_id = $parsedBody['transaksi_id'];
        $buah_id = $parsedBody['buah_id'];
        $jumlah = $parsedBody['jumlah'];
        $harga_total = $parsedBody['harga_total'];

        $db = $this->get(PDO::class);

        try {
            $query = $db->prepare('CALL CreateDetailTransaksi(?, ?, ?, ?, ?)');
            $query->bindParam(1, $detail_transaksi_id, PDO::PARAM_INT);
            $query->bindParam(2, $transaksi_id, PDO::PARAM_INT);
            $query->bindParam(3, $buah_id, PDO::PARAM_INT);
            $query->bindParam(4, $jumlah, PDO::PARAM_INT);
            $query->bindParam(5, $harga_total, PDO::PARAM_INT);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Detail transaksi disimpan dengan id ' . $detail_transaksi_id
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menyimpan detail transaksi: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // POST transaksi
    $app->post('/transaksi', function(Request $request, Response $response) {
        $parsedBody = $request->getParsedBody();

        $transaksi_id = $parsedBody['transaksi_id'];
        $tanggal = $parsedBody['tanggal'];
        $pembeli_id = $parsedBody['pembeli_id'];

        $db = $this->get(PDO::class);

        try {
            $query = $db->prepare('CALL CreateTransaksi(?, ?, ?)');
            $query->bindParam(1, $transaksi_id, PDO::PARAM_INT);
            $query->bindParam(2, $tanggal, PDO::PARAM_STR);
            $query->bindParam(3, $pembeli_id, PDO::PARAM_INT);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Detail transaksi disimpan dengan id ' . $transaksi_id
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menyimpan transaksi: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // delete buah
    $app->delete('/buah/{buah_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['buah_id'];

        try {
            $query = $db->prepare('CALL DeleteBuah(?)');
            $query->bindParam(1, $id, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'buah dengan id ' . $id . ' telah dihapus'
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menghapus buah: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // delete penjual
    $app->delete('/penjual/{penjual_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['penjual_id'];

        try {
            $query = $db->prepare('CALL DeletePenjual(?)');
            $query->bindParam(1, $id, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'penjual dengan id ' . $id . ' telah dihapus'
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menghapus penjuak: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // delete pemebeli
    $app->delete('/pembeli/{pembeli_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['pembeli_id'];

        try {
            $query = $db->prepare('CALL DeletePembeli(?)');
            $query->bindParam(1, $id, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'pembeli dengan id ' . $id . ' telah dihapus'
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menghapus pembeli: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // delete detail_transaksi
    $app->delete('/detail_transaksi/{detail_transaksi_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['detail_transaksi_id'];

        try {
            $query = $db->prepare('CALL DeleteDetailTransaksi(?)');
            $query->bindParam(1, $id, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'detail transaksi dengan id ' . $id . ' telah dihapus'
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menghapus detail_transaksi: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });

    // delete transaksi
    $app->delete('/transaksi/{transaksi_id}', function(Request $request, Response $response, $args) {
        $db = $this->get(PDO::class);
        $id = $args['Transaksi_id'];

        try {
            $query = $db->prepare('CALL DeleteTransaksi(?)');
            $query->bindParam(1, $id, PDO::PARAM_STR);

            $query->execute();

            $response->getBody()->write(json_encode(
                [
                    'message' => 'Transaksi dengan id ' . $id . ' telah dihapus'
                ]
            ));
        } catch (PDOException $e) {
            $response->getBody()->write(json_encode(
                [
                    'error' => 'Gagal menghapus Transaksi: ' . $e->getMessage()
                ]
            ));
        }
        return $response->withHeader("Content-Type", "application/json");
    });
};



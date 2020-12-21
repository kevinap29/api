<div class="container-fluid mt-3">
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Silahkan Pilih</h3>
        </div>
        <div class="card-body">
          <form class="form-horizontal" id="ongkir" method="POST">
            <div class="form-group">
              <label>Kota Asal:</label>
                <select class="form-control" id="kota_asal" name="kota_asal" required="">
                </select>
            </div>
            <div class="form-group">
              <label>Kota Tujuan</label>
              <select class="form-control" id="kota_tujuan" name="kota_tujuan" required="">
                <option></option>
              </select>
            </div>
            <div class="form-group">
              <label>Kurir</label>          
              <select class="form-control" id="kurir" name="kurir" required="">
                <option value="jne">JNE</option>
                <option value="tiki">TIKI</option>
                <option value="pos">POS INDONESIA</option>
              </select>
            </div>
            <div class="form-group">
              <label>Berat (Kg)</label>
              <input type="text" class="form-control" id="berat" name="berat" required="">
            </div>
            <div class="form-group">        
              <button type="submit" class="btn btn-primary btn-block">Cek</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-7" id="response_ongkir">      
    </div>
  </div>
</div>
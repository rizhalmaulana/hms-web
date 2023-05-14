<div class="widget-sidebar sidebar-search">
    <h5 class="sidebar-title">Search</h5>
    <div class="sidebar-content">
        <?= form_open(base_url().'search'); ?>
        <div class="input-group">
            <input type="text" class="form-control" name="cari" placeholder="Search for..." aria-label="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-secondary btn-search" type="submit">
                    <span class="ion-android-search"></span>
                </button>
            </span>
        </div>
        </form>
    </div>
</div>
<div class="widget-sidebar">
    <h5 class="sidebar-title">spot Terbaru</h5>
    <div class="sidebar-content">
        <ul class="list-sidebar">
            <?php 
      $spot = $this->db->query("SELECT * FROM spot,pengguna,jalur WHERE spot_status='publish' AND spot_author=pengguna_id AND spot_jalur=jalur_id ORDER BY spot_id DESC LIMIT 3")->result();
      foreach($spot as $a){
        ?>
            <li>
                <a href="<?= base_url().$a->spot_slug; ?>"><?= $a->spot_pos; ?></a>
            </li>
            <?php
      }
      ?>
        </ul>
    </div>
</div>
<!-- <div class="widget-sidebar">
  <h5 class="sidebar-title">Halaman</h5>
  <div class="sidebar-content">
    <ul class="list-sidebar">
      <?php 
      $halaman = $this->m_data->get_data('halaman')->result();
      foreach($halaman as $h){
        ?>
        <li>
          <a href="<?= base_url().'page/'.$h->halaman_slug; ?>"><?= $h->halaman_judul; ?></a>
        </li>
        <?php
      }
      ?>
    </ul>
  </div>
</div> -->
<div class="widget-sidebar widget-tags">
    <h5 class="sidebar-title">jalur</h5>
    <div class="sidebar-content">
        <ul>
            <?php 
      $jalur = $this->m_data->get_data('jalur')->result();
      foreach($jalur as $k){
        ?>
            <li>
                <a href="<?= base_url().'jalur/'.$k->jalur_slug; ?>"><?= $k->jalur_nama; ?></a>
            </li>
            <?php
      }
      ?>
        </ul>
    </div>
</div>
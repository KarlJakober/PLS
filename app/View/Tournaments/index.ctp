<div class="container">
  <div class="page-content">
    <div class="row">
      <div class="col-lg-12">
        <?php echo $this->Session->flash(); ?>
        <div class="page-header">
          <h1 id="Tournaments"><?php echo __('Tournaments'); ?></h1>
        </div>
        <div class="page-content">
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <th><?php echo $this->Paginator->sort('id'); ?></th>
                <th><?php echo $this->Paginator->sort('lan_id'); ?></th>
                <th><?php echo $this->Paginator->sort('name'); ?></th>
                <th><?php echo $this->Paginator->sort('start_time'); ?></th>
                <th><?php echo $this->Paginator->sort('end_time'); ?></th>
                <th><?php echo $this->Paginator->sort('type'); ?></th>
                <th><?php echo $this->Paginator->sort('allow_teams');?></th>
                <th><?php echo $this->Paginator->sort('assigned_admin');?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              foreach ($tournaments as $tournament):
                $class = null;
                if ($i++ % 2 == 0) {
                  $class = ' class="altrow"';
                }
                ?>
                <tr<?php echo $class; ?>>
                  <td><?php echo h($tournament['Tournament']['id']); ?>&nbsp;</td>
                  <td>
                    <?php echo $this->Html->link($tournament['Lan']['name'], array('controller' => 'lans', 'action' => 'view', $tournament['Lan']['id'])); ?>
                  </td>
                  <td><?php echo $this->Html->link(h($tournament['Tournament']['name']), array('action' => 'view', $tournament['Tournament']['id'])); ?>&nbsp;</td>
                  <td><?php echo h($tournament['Tournament']['start_time']); ?>&nbsp;</td>
                  <td><?php echo h($tournament['Tournament']['end_time']); ?>&nbsp;</td>
                  <td><?php echo h($tournament['Tournament']['type']); ?>&nbsp</td>
                  <td><?php echo h($tournament['Tournament']['allow_teams']); ?>&nbsp</td>
                  <td><?php echo h($tournament['Tournament']['assigned_admin']); ?>&nbsp</td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
          <p><?php echo $this->element('paging'); ?></p>
          <?php echo $this->element('pagination'); ?>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
    <div class="page-content">
        <div class="row">
          <div class="col-lg-12">
            <?php echo $this->Session->flash(); ?>
            <div class="teams view">
            <h2><?php  echo h($team['Team']['name']); ?></h2>
            	<dl>
            		<dt><?php echo __('Manager'); ?></dt>
            		<dd>
            			<?php echo $this->Html->link($team['Manager']['username'], array('controller' => 'Users', 'action' => 'view', $team['Team']['manager_id'])); ?>
            			&nbsp;
            		</dd>
            		<dt><?php echo __('Members'); ?></dt>
            		<dd>
            		<?php foreach($team['Member'] as $member) {
            		    echo $this->Html->link($member['username'], array('controller' => 'Users', 'action' => 'view', $member['id'])) . '<br />';
            		} ?>
            		</dd>
            	</dl>
            	<?php 
            	echo $this->Html->link(__('Join Team'), array('controller' => 'Teams', 'action' => 'join', $team['Team']['id'])) . '<br />';
            	echo $this->Html->link(__('Edit Team'), array('controller' => 'Teams', 'action' => 'edit', $team['Team']['id'])) . '<br />';
            	echo $this->Html->link(__('Team Join Requests'), array('controller' => 'Teams', 'action' => 'teamRequests', $team['Team']['id'])) . '<br />';
            	echo $this->Html->link(__('Delete Team'), array('controller' => 'Teams', 'action' => 'delete', $team['Team']['id']));
            	?>
            </div>
          </div>
        </div>
    </div>
</div>

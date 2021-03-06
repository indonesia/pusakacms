<?php if(! empty($pages)):
	foreach($pages as $slug => $content): ?>
    <li data-title="<?php echo $content['title']; ?>" data-slug="<?php echo $slug; ?>" data-url="<?php echo $content['url']; ?>" class="dd-item dd3-item">
        <div class="dd-handle dd3-handle" title="klik and drag to rearrange"><span class="fa fa-align-justify" style="color:#aaa;line-height:27px;"></span></div>
        <div class="dd3-content">
            <?php echo $content['title']; ?>
            <small><a href="<?php echo site_url($content['url']); ?>" target="_blank" class="page-url"><?php echo $content['url']; ?></a></small>
            <div class="align-right pull-right">
                <div class="option">
                    <a href="<?php echo site_url('panel/pages/edit?page='.$content['url']); ?>" class="edit" title="Edit"><span class="fa fa-edit"></span></a>
					<a href="<?php echo site_url('panel/pages/create?parent='.$content['url']); ?>" class="add" title="Add Subpage"><span class="fa fa-plus"></span></a>
					<a href="<?php echo site_url('panel/pages/delete?page='.$content['url']); ?>" class="remove" title="Delete"><span class="fa fa-times"></span></a>
                </div>
            </div>
        </div>
        <?php if(isset($content['children'])): ?>
            <ol class="dd-list">
    		  <?php echo Modules::run('panel/pages/_page_list', $content['children']); ?>
            </ol>
        <?php endif; ?>
    </li>
<?php endforeach; endif; ?>

<? $this->displayView('components/header.php', array('title' => 'Import')); ?>
			<h1>
				<a href="Importer/index" title="<? echo $this->localize('Import'); ?>"><? echo $this->localize('Import'); ?></a>
			</h1>
			<div class="options">
				<a class="option" href="<? echo $this->getConfiguration('cheeseUrl'); ?>" title="<? echo $this->localize('Objects'); ?>"><? echo $this->localize('Objects'); ?></a>
			</div>
			<form action="<? echo $this->getConfiguration('baseUrl'); ?>Importer/import" method="post">
				<table class="content">
					<thead class="head">
						<tr>
							<th class="field" colspan="2">
								<input id="check-all" class="checkbox check-all" type="checkbox" name="checkAll" value="yes"/>
								<label for="check-all">
									<? echo $this->localize('Directories'); ?>
								</label>
							</th>
						</tr>
					</thead>
					<tbody class="body">
<? $n = 0; foreach ($Coachings as $key => $directory): $n++; ?>
							<tr id="group<? echo $key; ?>" class="<? echo $n % 2 ? 'even' : 'odd'; ?> divider">
								<td class="field data">
									<input id="checkbox<? echo $key; ?>" class="checkbox" type="checkbox" name="keys[]" value="<? echo $key; ?>"/>
									<label for="checkbox<? echo $key; ?>">
										<? echo $key; ?>
									</label>
								</td>
								<td class="wide field">
									<label for="checkbox<? echo $key; ?>">
										<small><? echo $directory; ?></small>
									</label>
								</td>
							</tr>
<? endforeach; ?>
					</tbody>
					<tfoot class="foot">
						<tr>
							<td class="field" colspan="2">
								<input class="submit" type="submit" name="submit" value="<? echo $this->localize('Import'); ?>"/>
							</td>
						</tr>
					</tfoot>
				</table>
			</form>
<? $this->displayView('components/footer.php'); ?>
import app from 'flarum/admin/app';
import { ConfigureWithOAuthPage } from '@fof-oauth';

app.initializers.add('gbcl/oauth-logto', () => {
  app.extensionData
    .for('gbcl-logto')
    .registerPage(ConfigureWithOAuthPage);
});
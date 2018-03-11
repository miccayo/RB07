using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.IO;
using System.Diagnostics;
using Microsoft.Win32;

namespace RBLauncher_New
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);

            string[] args = Environment.GetCommandLineArgs();
            string CurrentDirectory = Directory.GetCurrentDirectory();
            string InstallDirectory = null;

            RegistryKey Software = Registry.CurrentUser.OpenSubKey("SOFTWARE", true);
            RegistryKey Classes = Software.OpenSubKey("Classes", true);

            RegistryKey ProtocolKey = Classes.OpenSubKey("RB07", true);

            try
            {

                try
                {

                    if (ProtocolKey != null)
                    {

                        if (ProtocolKey.GetValue("InstallPath") != null)
                        {
                            InstallDirectory = ProtocolKey.GetValue("InstallPath").ToString();
                        }
                        else
                        {
                            MessageBox.Show("The URI installer has not yet been run, so the launcher doesn't know where to look for your installation. Run it and then try again.", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Error);
                            Environment.Exit(0);
                        }

                    }
                    else
                    {
                        MessageBox.Show("The URI installer has not yet been run, so the launcher doesn't know where to look for your installation. Run it and then try again.", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Error);
                        Environment.Exit(0);
                    }

                }
                catch (Exception e)
                {
                    MessageBox.Show(@"The registry could not be accessed. Report this issue. (Exception: " + e + ")", "Unable to access registry", MessageBoxButtons.OK, MessageBoxIcon.Error);
                }

                void ShowError()
                {
                    MessageBox.Show("Are you sure you're launching from the website? Try again in a bit.", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                    Environment.Exit(0);
                }

                if (args == null || args.Length < 2)
                {
                    ShowError();
                }
                else
                {
                    args[1] = args[1].Replace("rb07://", "");
                    args[1] = args[1].Replace("&l=", "");

                    if (args[1].StartsWith("rb07.herokuapp.com/")) // From the new host
                    {

                        try
                        {

                            Process RB07 = new Process();

                            RB07.StartInfo.FileName = (InstallDirectory + "\\RB07Client.exe"); // launch program
                            RB07.StartInfo.Arguments = "-script \"http://" + args[1] + "\""; // Program -script "http://" + "pork.co.nf"
                            RB07.StartInfo.WindowStyle = ProcessWindowStyle.Maximized;
                            RB07.Start();

                            Environment.Exit(0);

                        } catch (Exception)
                        {

                            //try
                            //{

                            //    // ProtocolKey.SetValue("InstallPath", CurrentDirectory);

                            //} catch (Exception e)
                            //{
                            //    MessageBox.Show("A critical error occurred. Report this issue. (Exception: " + e + ")", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Error);
                            //}

                            MessageBox.Show("An error occurred while attempting to launch RB07. This probably means the application wasn't found in the install folder.\n\nRunning the URI installer again in the same folder as RB07 will fix this issue.", "Notice", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        }

                        Environment.Exit(0);

                    }
                    else
                    {
                        ShowError();
                    }
                }

            } catch (Exception e)
            {
                MessageBox.Show(@"An error occurred. Report this issue. (Exception: " + e + ")", "An error occurred", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }

        }
    }
}
